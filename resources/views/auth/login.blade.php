@extends('templatedeslogado')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default margin-t-2">
				<div class="panel-heading"><h5 class="texto-preto">{{ trans('global.lbl_login') }}</h4></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label"><span class="texto-branco">{{ trans('global.lbl_email') }}</span></label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"><span class="texto-branco">{{ trans('global.lbl_password') }}</span></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"><span class="texto-branco">{{ trans('global.lbl_login_keepme') }}</span>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primario btn-acao">{{ trans('global.lbl_login') }}</button>
								<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook">
									<i class="fa fa-facebook"></i>{{ trans('global.fb_login') }}
								</a>
								<div class="margin-t-1">
									<a class="texto-branco" href="{{ url('/password/email') }}">
										{{ trans('global.lbl_password_forgot') }}
									</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
