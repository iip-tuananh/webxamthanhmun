<script>
    class Result extends BaseChildClass {

        before(form) {
        }

        after(form) {

        }


        get submit_data() {
            let data =  {
                title: this.title ?? null,
            }

            return data;
        }


    }
</script>
