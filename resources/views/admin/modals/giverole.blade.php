<!-- Modal -->
<form action="{{ url('/quanly/nhvien/capquyen/'.$row->phone) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

  <div class="modal fade" id="ModalGiveRole{{$row->phone}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">CẤP QUYỀN TÀI KHOẢN</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>

        <div class="modal-body">
          <div class="form-group">
                <label> Họ và tên </label>
                <input type="text" name="name" class="form-control" width = "50px" value="{{$row->name}}" readonly>
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
</form>
