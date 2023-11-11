@extends('layouts.mynavbar')
 @section('content')
<div class="container">
  <div class="row">
    <div class="card mb-3" style="width: 100%;">
      <div class="card-header">
        <i class="fa fa-table"></i> Create Attendence </div>
      <div class="card-body">

      
                      <form method="post" action="{{route('attendance.store')}}" enctype="multipart/form-data" role="form">
   {{csrf_field()}}
   <div align="right">
                <button type="submit" name="bulk_delete" id="bulk_delete" class="btn btn-success" >Save Data</button>

    </div> <br />
      <div class="table-responsive">
          <table border="0" class="table table-striped table-bordered table-hover " id="example">
            <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Teacher Name</th>
                <th>Teacher Phone</th>
                <th>Date</th>
                <th>Absence</th>
            </tr>
            @if ($teacheres->count()>0 ) @foreach ($teacheres as $index=>$teach)
              <tr class="text-center">
                <td>{{$index +1}}</td>
                <td>
                  {{$teach->teach_name}}
                   <input type="hidden" name="name" class="" value="{{$teach->teach_name}}" />
                </td>
                <td>
                    {{$teach->phone_number}}
                <input type="hidden" name="phone" class="" value="{{$teach->phone_number}}" />
                </td>
                <td>

                    {{$date=date("d/m/Y")}}
                   
                    <input type="hidden" name="today[]" class="" value="{{$date}}" />
                </td>
                <td>

                      <input type="checkbox" name="teachAttend[]" class="form-check-input" value="{{$teach->id}}"

 @foreach ($teach->attendances as $index=>$attend)
    @if ($date=$attend->created_at->format("d/m/y"))
                    checked disabled
      @endif
                @endforeach
                > 


                </td>

             
              </tr>
              @endforeach @else @endif
        </thead>

    </table>

</form>

</div>

</div>
  </div>

</div>

</div>


@endsection