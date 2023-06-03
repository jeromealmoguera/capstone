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

                        <div class="col-sm-6 d-flex">
                            <a href="{{ route('personnel-list') }}">
                                <div class="form-group mt-4">
                                    <button type="button"  class="btn btn-white">Cancel</button>
                                </div>
                            </a>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- .card-preview -->
        {{-- Modal --}}
        <div class="modal fade" tabindex="-1" id="modalAlert">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                            <h4 class="nk-modal-title">Congratulations!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">You have successfully sent a message.</div>
                                <span class="sub-text-sm">Learn when you receive bitcoin in your wallet. <a href="#">Click here</a></span>
                            </div>
                            <div class="nk-modal-action">
                                <a href="{{ route('personnel-list') }}" class="btn btn-lg btn-mw btn-primary">OK</a>
                            </div>
                        </div>
                        @if(session('success'))
                            <script>
                                $(document).ready(function() {
                                    $('#modalAlert').modal('show');
                                });
                            </script>
                        @endif
                    </div><!-- .modal-body -->
                </div>
            </div>
        </div>
        {{-- End Modal --}}
    </div><!-- .nk-block -->
</div>


@endsection
