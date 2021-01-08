@foreach($goods as $goods)
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-3">
      <img src="..." class="card-img" alt="">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">
          <a href="{{ route('goods.show', $goods->no) }}">{{ $goods->title }}</a>
        </h5>
        <span class="card-text">{{ $goods->contents }}</span>
        <span class="card-text"><small class="text-muted">{{ $goods->no }}</small></span>
      </div>
    </div>
  </div>
</div>
@endforeach

