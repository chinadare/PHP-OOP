  <script>

    $(document).ready(function(){
        var trigger = $('.nav ul li a'),
        container = $('#content');

        trigger.on('click' ,function(){
            var $this =$(this),
            target = $this.data('target');

            container.load(target + '.php');

            return false;

        });


    });


    </script>
