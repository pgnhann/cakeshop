<!-- Modal -->
<form action="{{ url('/quanly/gioithieu/updated/'.$row->ID) }}" method="post">
{{ csrf_field() }}
  <div class="modal fade" id="ModalAboutUs{{$row->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">CẬP NHẬT GIỚI THIỆU</h5>
        </div>

        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" name = "title" value ="{{$row->Title}}" style="font-size: 17px;">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                <textarea class="form-control" name = "content" rows="10" style="font-size: 17px;">{{$row->Content}}</textarea>
            </div>

        <input type="hidden" name="id" value="{{ $row->ID }}">

        <div class="modal-footer">
          <a href="{{ route('abus.main') }}"class="btn btn-secondary" data-dismiss="modal">HỦY</a>
          <button type="submit" class="btn btn-primary">LƯU</button>
        </div>

      </div>
    </div>
  </div>
</form>
