<!-- Modal -->
<div class="modal fade" id="ModalOrderDetail{{$row->Order_Id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">XEM ĐƠN HÀNG CHI TIẾT</h5>
                  </div>

                  <div class="modal-body">
                        <div class="form-group">
                              <label style ="font-weight: bold;"> Mã đơn hàng </label>
                              <input type="text" name="orderid" class="form-control" width = "50px" value="{{$row->Order_Id}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Mã nhân viên </label>
                              <input type="text" name="staffid" class="form-control" width = "50px" value="{{$row->Staff_Id}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Tên người nhận </label>
                              <input type="text" name="reciphone" class="form-control" width = "50px" value="{{$row->Recipient_Name}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Số điện thoại người nhận </label>
                              <input type="text" name="reciname" class="form-control" width = "50px" value="{{$row->Recipient_Phone}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Email người nhận </label>
                              <input type="text" name="reciemail" class="form-control" width = "50px" value="{{$row->Recipient_Email}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Tên sản phẩm </label>
                              <input type="text" name="proname" class="form-control" width = "50px" value="{{$row->Product_Names}}" readonly>
                        </div>

                        <div class="form-group">
                              <label style ="font-weight: bold;"> Tổng số lượng </label>
                              <input type="text" name="totalquan" class="form-control" width = "50px" value="{{$row->Total_Quantity}}" readonly>
                        </div>
                        <div class="form-group">
                              <label style ="font-weight: bold;"> Khuyến mãi </label>
                              <input type="text" name="prmid" class="form-control" width = "50px" value="{{$row->Pro_Discount}}" readonly>
                        </div>
                  </div>
            </div>
      </div>
</div>
