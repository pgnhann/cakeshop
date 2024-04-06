<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Order1;
use App\Models\Order_Detail;
use App\Models\Count;
use App\Models\Detail_Count;
use Exception;


use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public function Hotsale_Product()
    {
        $productSales = Order_Detail::selectRaw('Pd_Id, SUM(Quantity) AS total_sales')
            ->groupBy('Pd_Id')
            ->orderBy('total_sales', 'desc')
            ->limit(10)
            ->get();
        $topSellingProducts = $productSales->sortByDesc('total_sales');
        return response()->json($topSellingProducts);
    }
    public function filter(Request $request)
    {
        $filters = $request->all();
        $query = Order1::query();
        if(isset($filters['Cus_Phone'])){
            $query->where('Cus_Phone',$filters['Cus_Phone']);
        }
        if (isset($filters['From_Date'])) {
            $query->whereDate('Create_Date', '>=', $filters['From_Date']);
        }
        if (isset($filters['To_Date'])) {
            $query->whereDate('Create_Date', '<=', $filters['To_Date']);
        }
        if(isset($filters['Staff_Id'])){
            $query->where('Staff_Id',$filters['Staff_Id']);
        }
        if(isset($filters['Payment_Code'])){
            $query->where('Payment_Code',$filters['Payment_Code']);
        }
        if(isset($filters['status'])){
            $query->where('status',$filters['status']);
        }
        if(isset($filters['React'])){
            $query->where('React',$filters['React']);
        }
        if(isset($filters['Promote'])){
            if($filters['Promote']="Yes"){
                $query->whereNotNull('Prm_Id');
            }
            else $query->whereNull('Prm_Id');
        }
        $orders = $query->get();
        $detailed_orders = [];
        foreach ($orders as $order) {
            $order_details = Order_Detail::where('Order_Id', $order->Order_Id)->get(); // Get details for specific order

            // Combine order data with its detailed information
            $detailed_orders[] = [
                'order' => $order,
                'order_details' => $order_details,
            ];
        }
        return response()->json($detailed_orders);
    }
    public function get_pdf_file(Request $request)
    {
        $filters = $request->all();
        $query = Order1::query();
        if(isset($filters['Cus_Phone'])){
            $query->where('Cus_Phone',$filters['Cus_Phone']);
        }
        if (isset($filters['From_Date'])) {
            $query->whereDate('Create_Date', '>=', $filters['From_Date']);
        }
        if (isset($filters['To_Date'])) {
            $query->whereDate('Create_Date', '<=', $filters['To_Date']);
        }
        if(isset($filters['Staff_Id'])){
            $query->where('Staff_Id',$filters['Staff_Id']);
        }
        if(isset($filters['Payment_Code'])){
            $query->where('Payment_Code',$filters['Payment_Code']);
        }
        if(isset($filters['status'])){
            $query->where('status',$filters['status']);
        }
        if(isset($filters['React'])){
            $query->where('React',$filters['React']);
        }
        if(isset($filters['Promote'])){
            if($filters['Promote']="Yes"){
                $query->whereNotNull('Prm_Id');
            }
            else $query->whereNull('Prm_Id');
        }
        $orders = $query->get();
        $detailed_orders = [];
        foreach ($orders as $order) {
            $order_details = Order_Detail::where('Order_Id', $order->Order_Id)->get(); 

            $detailed_orders[] = [
                'order' => $order,
                'order_details' => $order_details,
            ];
        }
        
        $html_details=view('filter_list_detail_pdf',compact('detailed_orders'));
        
        return $html_details;
        
        //return PDF::loadHtml($html_details)->download('filter_list_detail_pdf.pdf');
    }
    public function sendOrder(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'created_date'=>'required|date',
                'Staff_Id'=>'required|string',
                'delivery_date'=>'required|string',
    
                'customer_info.0.Cus_Name'=>'required|string',
                'customer_info.0.Cus_Phone'=>'required|string',
                'customer_info.0.Recipient_Name'=>'required|string',
                'customer_info.0.Recipient_Phone'=>'required|string',
                'customer_info.0.Recipient_Email'=>'nullable|email',
                'customer_info.0.Recipient_Provice_City'=>'required|string',
                'customer_info.0.Recipient_District'=>'required|string',
                'customer_info.0.Recipient_Ward'=>'required|string',
                'customer_info.0.Recipient_Address'=>'required|string',
                'customer_info.0.Note' => 'nullable|string',
    
                'payment_list.0.payment_code' => 'required|string',
                'payment_list.0.amount'=>'required|numeric',
    
                'order_items.*.Pd_Id' => 'required|string',
                'order_items.*.Quantity' => 'required|integer',
                'order_items.*.Prm_Id' => 'nullable|string', 
                'order_items.*.Prm_Disc' => 'nullable|numeric', 
                'order_items.*.Org_Price_P' => 'required|numeric',
                'order_items.*.AfterPrm_Price_P' => 'required|numeric',
                'order_items.*.AfterPrm_Price_Total' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }
            if ($request->payment_list[0]['payment_code'] == 'cash') {
    
                $count = Count::first()->count;
                $order_id="Od".(string)$count;
                $orderData = [
                        'Order_Id' => $order_id,
                        'Total'=>$request['payment_list.0.amount'],
                        "Cus_Name"=>$request['customer_info.0.Cus_Name'],
                        'Cus_Phone'=>$request['customer_info.0.Cus_Phone'],
                        'Staff_Id'=>$request['Staff_Id'],
                        'Recipient_Name'=>$request['customer_info.0.Recipient_Name'],
                        'Recipient_Phone'=>$request['customer_info.0.Recipient_Phone'],
                        'Recipient_Email'=>isset($request['customer_info.0.Recipient_Email']) ? $request['customer_info.0.Recipient_Email'] : null,
                        'Recipient_Province_City'=>$request['customer_info.0.Recipient_Provice_City'],
                        'Recipient_District'=>$request['customer_info.0.Recipient_District'],
                        'Recipient_Ward'=>$request['customer_info.0.Recipient_Ward'],
                        'Recipient_Address'=>$request['customer_info.0.Recipient_Address'],
                        'Note'=>isset($request['customer_info.0.Note']) ? $request['customer_info.0.Note'] : null,
                        'Create_Date'=>$request['created_date'],
                        'Payment_Code'=>$request['payment_list.0.payment_code']
                ];
                Order1::Create($orderData);
                foreach($request['order_items'] as $item){
                    $detail_count = Detail_Count::first()->count;
                    $Order_Detail_Id="O".(string)$detail_count;
                    $order_detailData=[
                        'Order_Detail_Id'=>$Order_Detail_Id,
                        'Order_Id'=>$order_id,
                        'Pd_Id'=>$item['Pd_Id'],
                        'Quantity'=>$item['Quantity'],
                        'Prm_Id'=>$item['Prm_Id'],
                        'Prm_Disc'=>$item['Prm_Disc'],
                        'Org_Price_P'=>$item['Org_Price_P'],
                        'AfterPrm_Price_P'=>$item['AfterPrm_Price_P'],
                        'AfterPrm_Total'=>$item['AfterPrm_Price_Total']
                    ];
                    $Pd_Name = Product::where('Pd_id','=',$item['Pd_Id'])->pluck('Pd_Name');
                    $order_detailData['Pd_Name']=$Pd_Name;
                    Order_Detail::create($order_detailData);
                    Detail_Count::where('count','=',$detail_count)->delete();
                    $detail_count_new=$detail_count+1;
                    Detail_Count::create(['count' => $detail_count_new]);
                }
                Count::where('count','=',$count)->delete();
                $count++;
                Count::create(['count' => $count]);
                
            }
            return response()->json(['success' => true, 'message' => 'Order created successfully!']);
        }
        catch (Exception $exception){
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the order. Please try again later. Error: ' . $exception->getMessage(),
            ], 500);
        }
        
    }
    

}
