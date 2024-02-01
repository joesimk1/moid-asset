@extends("layout")

@section("page-content")
<div class="px-4 pt-4">
                    <div>
                        <h3>Asset Categories</h3>
                    </div>
                    <div class="my-4">
                        @if(session()->has('success-status'))
                        <div class="card bg-success">
                            <div class="card-body text-white">
                            {{session('success-status')}}
                            </div>
                        </div>
                        @endif
                    </div>

                    <h4 class="mb-4">
                        Edit Asset Category
                    </h4>
                    <hr>
                    <div class="tab-content mt-2">
                        <div class="tab-pane  active" id="new-tab-pane" role="tabpanel">
                           <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form class="mt-8" action="{{ url('assetcategories/'.$assetcategory->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="name"
                                                   value="{{$assetcategory->name}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="code"
                                                   value="{{$assetcategory->code}}"
                                                   class= "form-control">
                                        </div>

                                    <div class="row mb-3 ">
                                        <label htmlFor="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10 has-validation">
                                            <textarea name="description"
                                                      class="form-control">{{$assetcategory->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label htmlFor="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary" type="submit">
                                            <span>Update</span>
                                            </button>
                                            <a href="{{url('assetcategories')}}" class="btn btn-success">
                                                cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
@stop
