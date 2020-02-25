<!-- Search -->
<div class="box-tools pull-right">
    <form class="form" role="form" method="GET" action="{{$_listLink }}">
        <div class="input-group input-group-sm margin-r-5 pull-left" style="width: 200px;">
            <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="Search...">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <a href="{{ $_createLink }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i> <span>Add</span>
        </a>
    </form>
</div>
<!-- END Search -->
