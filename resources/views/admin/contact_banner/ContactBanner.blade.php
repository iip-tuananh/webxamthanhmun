@include('admin.spa.Block')

<script>
    class ContactBanner extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get submit_data() {
            let data = new FormData();

            safeAppend(data, 'title', this.title);
            safeAppend(data, 'page', 'contact-banner');

            let image = this.image.submit_data;
            if (image) data.append('image', image);

            return data;
        }
    }
</script>
