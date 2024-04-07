<!-- Modal -->
<!-- <form action="{{ url('/quanly/donhang/chitiet/'.$row->phone) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }} -->
  <div class="modal fade" id="ModalOrderDetail{{$row->madh}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">XEM ĐƠN HÀNG CHI TIẾT </h5>
        </div>

        <div class="modal-body">
          <div class="form-group">
                <label> Mã đơn hàng </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Mã đơn hàng chi tiết </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Tên sản phẩm </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Số lượng </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Mã giảm giá </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Tổng tiền </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>

          <div class="form-group">
                <label> Mã đơn hàng chi tiết </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->madh}}" readonly>
          </div>


          <div class="form-group">
                <label> Chức vụ </label>
                <select name="posi">
                    @if($row->position == "Nhân viên")
                        <option value="Nhân viên" selected>Nhân viên</option>
                        <option value="Quản lý">Quản lý</option>
                    @else
                        <option value="Nhân viên">Nhân viên</option>
                        <option value="Quản lý" selected>Quản lý</option>
                    @endif
                </select>
          </div>
        </div>

        <input type="hidden" name="sdt" value="{{ $row->phone }}">

        <div class="modal-footer">
          <a href="{{ route('account.main') }}"class="btn btn-secondary" data-dismiss="modal">HỦY</a>
          <button type="submit" class="btn btn-primary">LƯU</button>
        </div>

      </div>
    </div>
  </div>
<!-- </form> -->
