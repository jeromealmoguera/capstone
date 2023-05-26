@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Send SMS</h4>
            </div>
        </div>
        <!-- Send SMS Page -->
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block">
                    <span class="preview-title-lg overline-title">Send SMS</span>
                    <form action="{{ route('send.sms') }}" method="POST">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="mobile_no">Phone Number w/ Country Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" placeholder="Phone Number"
                                            name="mobile_no" value="{{ request()->get('mobile_no') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="message">Textarea</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" id="default-textarea"
                                            name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- .card-preview -->

    </div><!-- .nk-block -->
</div>


@endsection
