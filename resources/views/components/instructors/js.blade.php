<script>
    var vacation = document.querySelector("#vacation");
    var dayOff = document.querySelector("#dayOff");
    var inputs = document.querySelectorAll(".input");

    $(document).ready(function() {
        $('.select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
        });
    });

    vacation.addEventListener('click', (event) => {
        zero('FÉRIAS', this);
    });
    dayOff.addEventListener('click', (event) => {
        zero('FOLGA', this);
    });

    function zero(type) {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "0000-00-00";
        }
    }
</script>
