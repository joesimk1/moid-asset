@extends("layout")

@section("page-content")
<div class="px-4 pt-4">
                    <div>
                        <h3>Assets</h3>
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
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link "
                                id="view-tab"
                                href={{ url('assets') }}
                                aria-controls="view-tab-pane"
                                aria-selected="true">
                                View
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="new-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#new-tab-pane"
                                type="button"
                                role="tab"
                                aria-controls="new-tab-pane"
                                aria-selected="false">
                                New
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-2">
                        <div class="tab-pane  active" id="new-tab-pane" role="tabpanel">
                           <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form class="mt-8" action="{{ route('assets.store') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">creation date</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="creation_date"
                                                   class= "form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">Depreciation method</label>
                                        <div class="col-sm-10 has-validation">
                                           <select name="" class="form-select">
                                             <option value="">-- Select Method --</option>
                                             <option value="admin">Straight line</option>
                                             <option value="instadmin">Decline balance</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">useful life</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="useful_life"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label htmlFor="inputEmail3" class="col-sm-2 col-form-label">department id</label>
                                        <div class="col-sm-10 has-validation">
                                            <textarea name="department_id"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label htmlFor="inputEmail3" class="col-sm-2 col-form-label">asset category id</label>
                                        <div class="col-sm-10 has-validation">
                                            <textarea name="asset_category_id"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">user id</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="user_id"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">acquisition date</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="acq_date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
                                        <label class="col-sm-2 col-form-label">description</label>
                                        <div class="col-sm-10 has-validation">
                                            <input type="text"
                                                   name="description"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label htmlFor="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary" type="submit">
                                            <span>Save</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                @stop
