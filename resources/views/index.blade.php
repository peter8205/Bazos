@extends('layouts.master')
@section('content')
<div class="container">
	<div class="card mt-3">
		<div class="card-header">
			Výpis inzeratov: 
		</div>
		<div class="card-body">

			<table class="table">
				<tr>
					<th>Obrázok</th>
					<th>Popis</th>
					<th>Cena</th>
					<th>Lokalita</th>
					<th>Zobrazenie</th>
				</tr>
				@foreach($posts as $post)
				<tr class="post-body" style="height: 30px;">
					<td style="width: 100px;">
						<img src="{{ asset('/images/').'/'.$post->images[0]->name }}" alt="{{ $post->images[0]->name }}"style="width: 100px; height: auto; max-height: 100px;">
					</td>
					<td style="vertical-align: top;  width: 70%;">
						<strong>{{ $post->nadpis }}</strong>
						<br>
						{{ $post->text }}
					</td>
					<td>10e</td>
					<td>Skalica 90901</td>
					<td>69x</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
