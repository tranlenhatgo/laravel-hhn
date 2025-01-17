@extends('layouts.client')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url({{asset('client/images/bg1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Sản phẩm</span></p>
            <h1 class="mb-0 bread">danh sách sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center categories">
    				<ul class="product-category">
						<li><a href="{{ route('categoryProducts', ['category_id' => 0]) }}" class="{{ is_null($selectedCategory) ? 'active' : '' }}">All</a></li>
						@forelse ($categories as $category)
							<li><a href="{{ route('categoryProducts', ['category_id' => $category->category_id]) }}" 
							class="{{ $category->category_id === $selectedCategory ? 'active' : '' }}">
							{{ $category->name }}</a></li>
						@empty
						No Categories
						@endforelse
    				</ul>
    			</div>
    		</div>
    		<div class="container">
				<div class="products row">
					@forelse($products as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="product-detail{{ $product->product_id }}" class="img-prod">
								<img class="img-fluid" src="{{ URL::asset('client/images/product/' . $product->image_url) }}" alt="Colorlib Template">
								<span class="status">30%</span>
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">{{ $product->name }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="mr-2 price-dc">{{ number_format($product->price, 0, ',', '.') }}đ</span><span class="price-sale">$70.00</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@empty
					Không có sản phẩm
					@endforelse
				</div>
			</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <!-- <div class="block-27"> -->
				{{$products->links()}}
              <!-- <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="shop2.html">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul> -->
            <!-- </div> -->
          </div>
        </div>
    	</div>
    </section>
@endsection