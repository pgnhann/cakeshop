<!-- Modal -->
<form action="{{ url('/quanly/donhang/updated/'.$row->Order_Id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="modal fade" id="ModalStatusOrder{{$row->Order_Id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG</h5>
        </div>

        <div class="modal-body">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkpayment" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckboxDefault"> Đã thanh toán? </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkdeliver" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"> Đã giao hàng? </label>
            </div>
        </div>

        <input type="hidden" name="orderid" value="{{ $row->Order_Id }}">

        <div class="modal-footer">
          <a href="{{ route('order.main') }}"class="btn btn-secondary" data-dismiss="modal">HỦY</a>
          <button type="submit" class="btn btn-primary">LƯU</button>
        </div>

      </div>
    </div>
  </div>
</form>
