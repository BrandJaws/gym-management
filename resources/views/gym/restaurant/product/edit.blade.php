@extends('_layouts.index')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @include('_layouts.flash-message')
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Update Product
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('restaurant.productUpdate')}}" method="POST" enctype="multipart/form-data"
                              class="kt-form kt-form--label-right">
                            @csrf
                            <input type="hidden" class="form-control" name="gym_id"
                                   value="{{  Auth::guard('employee')->user()->gym->id }}"/>
                            <input type="hidden" class="form-control" name="id" value="{{  $product->id }}"/>
                            @if($errors->has('restaurant_sub_category_id'))
                                <div class="error">{{ $errors->first('id') }}</div>
                            @endif
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-lg-8 ">
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Category :</label>
                                                <select name="restaurant_sub_category_id" class="form-control">
                                                    @foreach($subCategory as $row)
                                                        <option value="{{ $row->id }}"
                                                                @if( $product->id == $row->id) selected @endif>{{ $row->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('restaurant_sub_category_id'))
                                                    <div
                                                        class="error">{{ $errors->first('restaurant_sub_category_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Product :</label>
                                                <input type="text" maxlength="25" name="name"
                                                       value="{{ $product->name }}"
                                                       class="form-control"
                                                       required placeholder="Enter Name"/>
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Price :</label>
                                                <input type="number" maxlength="25" name="price" class="form-control"
                                                       value="{{ $product->price }}"
                                                       required placeholder="Enter Name"/>
                                                @if($errors->has('price'))
                                                    <div class="error">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>In Stock :</label>
                                                <select class="form-control" name="in_stock">
                                                    <option value="YES"
                                                            @if( $product->in_stock == 'YES') selected @endif>Yes
                                                    </option>
                                                    <option value="NO" @if( $product->in_stock == 'NO') selected @endif>
                                                        NO
                                                    </option>
                                                </select>
                                                @if($errors->has('in_stock'))
                                                    <div class="error">{{ $errors->first('in_stock') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Visible :</label>
                                                <select class="form-control" name="visible">
                                                    <option value="YES"
                                                            @if( $product->visible == 'YES') selected @endif >Yes
                                                    </option>
                                                    <option value="NO" @if( $product->visible == 'NO') selected @endif>
                                                        NO
                                                    </option>
                                                </select>
                                                @if($errors->has('in_stock'))
                                                    <div class="error">{{ $errors->first('in_stock') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Ingredients :</label>
                                                <input type="text" maxlength="25" name="ingredients"
                                                       class="form-control" value="{{ $product->ingredients }}"
                                                       required placeholder="Enter Ingredients"/>
                                                @if($errors->has('ingredients'))
                                                    <div class="error">{{ $errors->first('ingredients') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-15">
                                            <div class="col-lg-8">
                                                <label>Description :</label>
                                                <textarea class="form-control" placeholder="Enter Description"
                                                          name="description">{{ $product->description }}</textarea>
                                                @if($errors->has('description'))
                                                    <div class="error">{{ $errors->first('description') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-4 col-lg-4 col-form-label">Select Image
                                                        File</label>
                                                    <div class="col-lg-12">
                                                        <div class="kt-avatar" id="kt_user_avatar_2">
                                                            @if($product->productImage != "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url('{{ URL::to('/') }}/{{ $product->productImage->path }}')">
                                                                </div>
                                                            @endif
                                                            @if($product->productImage == "")
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('assets/media/users/trainingImg.png')}})">
                                                                </div>
                                                            @endif
                                                            <label class="kt-avatar__upload"
                                                                   data-toggle="kt-tooltip" title=""
                                                                   data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="image"
                                                                       accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title="" data-original-title="Cancel avatar"><i
                                                                    class="fa fa-times"></i></span>
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Create" class="btn btn-primary">
                                            <a href="{{route('restaurant.restaurantList')}}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>

@endsection

@section('custom-script')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{asset('js/input-mask.js')}}"></script>
    <script src="{{asset('js/ktavatar.js')}}"></script>

    <script src="{{asset('js/plugins.bundle.js')}}"></script>
    <script src="{{asset('js/scripts.bundle.js')}}"></script>
    <script src="{{asset('js/tagify.js')}}"></script>
@endsection
