<script>
    class Category extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\Category::getForSelect());

        before(form) {
            this.image = {};
            this.banner = {};
            this.show_home_page = 1;
        }

        after(form) {

        }


        get parent_id() {
            return this._parent_id;
        }

        set parent_id(value) {
            this._parent_id = Number(value);
        }
// Ảnh đại diện
        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

		clearImage() {
			if (this.image) this.image.clear();
		}
// Ảnh banner
        get banner() {
            return this._banner;
        }

        set banner(value) {
            this._banner = new Image(value, this);
        }

		clearBanner() {
			if (this.banner) this.banner.clear();
		}

        get submit_data() {
            let data = {
                name: this.name,
                intro: this.intro,
                short_des: this.short_des,
                icon: this.icon,
                // show_home_page: this.show_home_page,
            }
            data = jsonToFormData(data);
            let image = this.image.submit_data;
            let banner = this.banner.submit_data;
            if (image) data.append('image', image);
            if (banner) data.append('banner', banner);

            return data;
        }
    }
</script>
