<div>
  <div style="padding: 30px 0" class="container">
    <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ubah Password
                        </div>
                        <div class="panel-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('error')}}
                            </div>
                        @endif
                            <form wire:submit.prevent="changePassword" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Password saat ini</label>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="Password saat ini" class="form-control input-md" name="current_password" wire:model="current_password">

                                        @error('current_password') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Password baru</label>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="Password Baru" class="form-control input-md" name="password" wire:model="password">
                                        @error('password') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Konfirmasi Password baru</label>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="Konfirmasi Password baru" class="form-control input-md" name="password_confirmation" wire:model="password_confirmation">

                                        @error('password_confirmation') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-4">
                                       <button type="submit" class="btn btn-primary">Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>
