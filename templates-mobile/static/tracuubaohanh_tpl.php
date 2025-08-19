<div class="tra-cuu">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="tra-cuu__left">
                <div class="tra-cuu__input mb-3">
                    <label for="tra-cuu__input-phone" class="mb-2">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="tra-cuu__input-phone" placeholder="Số điện thoại">
                </div>
                <div class="tra-cuu__input mb-3">
                    <label for="tra-cuu__input-code" class="mb-2">Mã đơn hàng <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tra-cuu__input-code" placeholder="Mã đơn hàng" onKeyUp="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="tra-cuu__button">
                    <button type="button" class="btn btn-danger w-100">Kiểm tra</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tra-cuu__right">
                <p class="tra-cuu__title"><?= $static['name' . $lang] ?></p>
                <div class="tra-cuu__info w-clear"><?= $func->decodeHtmlChars($static['content' . $lang]) ?></div>
            </div>
        </div>
    </div>
    <div class="load-tra-cuu"></div>
</div>