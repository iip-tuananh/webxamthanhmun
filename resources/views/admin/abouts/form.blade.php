<style>
    /* Card wrapper cho mỗi section để nổi khối */
    .custom-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .custom-card .form-label {
        font-weight: 600;
    }

    .custom-card .required-label::after {
        content: "*";
        color: #e74c3c;
        margin-left: 4px;
    }

    /* Kết quả đạt được */
    .result-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 6px;
    }
    .result-item input {
        flex: 1;
        margin-right: 0.5rem;
    }
    .result-item .btn {
        min-width: 36px;
    }

    /* Thumbnail preview */
    .thumb-wrapper {
        text-align: center;
    }
    .thumb-wrapper img {
        max-width: 100%;
        border-radius: 6px;
        margin-bottom: 0.5rem;
        border: 1px solid #ccc;
    }
    .thumb-wrapper .btn-upload {
        width: 100%;
    }
</style>
<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
<div class="row">
    <div class="col-lg-8">
        <div class="custom-card">
            <h5 class="mb-4">Thông tin chung</h5>

            <div class="form-group mb-4">
                <label class="form-label required-label">Tiêu đề phụ</label>
                <input type="text" class="form-control" ng-model="form.title_1">
                <div class="invalid-feedback d-block"><% errors.title_1[0] %></div>
            </div>

            <div class="form-group mb-4">
                <label class="form-label required-label">Tiêu đề chính</label>
                <input type="text" class="form-control" ng-model="form.title_2">
                <div class="invalid-feedback d-block"><% errors.title_2[0] %></div>
            </div>

            <div class="form-group mb-4">
                <label class="form-label required-label">Nội dung dẫn</label>
                <textarea rows="4" class="form-control" ng-model="form.intro_text"></textarea>
                <div class="invalid-feedback d-block"><% errors.intro_text[0] %></div>
            </div>

            <div class="form-group mb-4">
                <label class="form-label required-label">Nội dung chính</label>
                <textarea rows="4" class="form-control" ng-model="form.body_text"></textarea>
                <div class="invalid-feedback d-block"><% errors.body_text[0] %></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header text-center ">
                <h5>Ảnh mô tả</h5>
            </div>
            <div class="card-body">
                <!-- Ảnh đại diện -->
                <div class="form-group text-center">
                    <div class="main-img-preview">
                        <label class="required-label">Chọn Ảnh</label>
                        <p class="help-block-img">* Ảnh định dạng: jpg, png</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
        <strong><% errors.image[0] %></strong>
      </span>
                </div>

                <hr>

{{--                <div class="form-group text-center">--}}
{{--                    <label for="">Ảnh phụ (2 ảnh)</label>--}}
{{--                    <div class="row gallery-area border">--}}
{{--                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">--}}
{{--                            <div class="gallery-item">--}}
{{--                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">--}}
{{--                                    <i class="fa fa-times mr-0"></i>--}}
{{--                                </button>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="img-chooser" title="Chọn ảnh">--}}
{{--                                        <label for="<% g.image.element_id %>">--}}
{{--                                            <img ng-src="<% g.image.path %>">--}}
{{--                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                    <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['galleries.' + $index + '.image_obj']">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image_obj' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 p-2">--}}
{{--                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">--}}
{{--                                <i class="fa fa-plus fa-2x text-secondary"></i>--}}
{{--                            </label>--}}
{{--                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['galleries']">--}}
{{--                <strong>--}}
{{--                    <% errors.galleries[0] %>--}}
{{--                </strong>--}}
{{--            </span>--}}
{{--                </div>--}}

            </div>
        </div>

    </div>
</div>

<div class="text-right mt-3">
    <button type="submit" class="btn btn-success px-4" ng-click="submit(0)" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
</div>
