@extends('app')

@section('content')
<div class="panel">
    <div class="heading">
        <span class="icon mif-file-text"></span>
        <span class="title">{{$data->judul}}</span>
    </div>
    <div class="content">
        {{ $data->isi }}
        <br><br>

        <div class="place-right">
          <span class="mif-calendar"></span>
          {{ date_format(date_create($data->create_at), "D, d M Y H:i:s") }}
          <span class="mif-user"></span>
          {{ App\User::find($data->idpengguna)['email'] }}
        </div>
        <br>
    </div>
</div>


<div class="panel">
  <div class="heading">
    <div class="icon mif-bubbles"></div>
    <div class="title">Comments</div>
  </div>
  <div class="content">
    <div id=form>
      <span style="padding:50px; font-size:50pt;" class="mif-spinner3 mif-ani-spin"></span>
    </div>
    <div id="komentar">

    </div>
  </div>
</div>
@endsection

@section('footer')
  <script type="text/javascript">

  	setTimeout(function(){

  	$("#form").html('<form>'+
                      '<table>'+
                          '<tr>'+
                            '<td>'+
                              '<div class="input-control textarea full-size">'+
                                  '<textarea id="input_komentar" type="text"></textarea>'+
                              '</div>'+
                            '</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td>'+
                              '<button class="button primary" onclick="send_comments()">Submit</button>'+
                            '</td>'+
                          '</tr>'+
                      '</table>'+
  					        '</form>');
  						},1000);

  function send_comments () {
  	$.ajax({
  		url:'{{ url("komentar") }}',
  		type:'POST',
  		data:{'idpost':{{ $data->id }},'_token':'{{ csrf_token() }}','isi':$("#input_komentar").val()},
  		success:function (argument) {
  			if(argument=="sukses"){
  				alert('sukses');
  			}
  		},
  		error:function () {
  			alert('error');
  		}
  	})
  }

  </script>

@endsection
