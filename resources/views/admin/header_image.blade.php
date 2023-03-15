@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>{{$title}}</h5>
                </div>
                <div class="card-body">
                    <form action=""  method="POST">
                        <label for="validatedCustomFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                          </div>
                      <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
