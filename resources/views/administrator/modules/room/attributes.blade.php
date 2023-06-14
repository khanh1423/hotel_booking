<div class="row gx-3 gy-2 align-items-center" id="attributePlus">
    <div class="col-md-3">
    <label class="form-label" for="selectTypeOpt">Thuộc tính</label>
    <select id="selectTypeOpt" name="attribute_id[]" class="form-select color-dropdown">
        @foreach($attrbutes as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="col-md-3">
    <label class="form-label" for="selectPlacement">Giá trị</label>
    <input type="text" class="form-control" name="attribute_value[]"/>
    </div>
    <div class="col-md-2">
        <label class="form-label" for="showToastPlacement">&nbsp;</label>
        <div class="card-body">
            <i class='bx bx-plus-circle text-primary' id="addAttribute" onclick="AddAttributes()"></i>
            <i class='bx bx-x-circle text-danger' id="removeAttribute"></i>
        </div>

    </div>
</div>