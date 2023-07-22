@extends('template.layout')
@section('content')
    <form action="{{route('route_student_edit',['id'=>$student->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nameInput">Name:</label>
            <input type="text" class="form-control" value="{{$student->name}}" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="emailInput">Email:</label>
            <input type="text" class="form-control" value="{{$student->email}}" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh CMND/CCCD</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview" src="{{ $student->image?''.Storage::url($student->image):''}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                        <label for="cmt_truoc">Mặt trước</label><br/>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
@endsection
@section('script')
    <!-- thêm đoạn jquery sau  -->
    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function () { // #cmt_trc là id của file
                readURL(this, '#mat_truoc_preview'); //#mat trc là id của anh
            });

        });
    </script>
@endsection

