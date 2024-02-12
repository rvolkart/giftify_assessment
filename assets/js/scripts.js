$(document).ready( function () {
    $('#cards-list').DataTable({
        paging: false
    });

    $('.btn-add-card').click(function() {
        let counter = $('.my-deck-record').length + 1;

        if(counter >= 31){
            alert("You've added the maximum of cards you can add.");
            return false;
        }

        let imageurl = '<img src="' + $(this).data('imageurl') + '">';
        let name = $(this).data('name');
        let manacost = $(this).data('manacost');
        let cmc = $(this).data('cmc');

        $("#my-deck-records").append('<tr class="my-deck-record">' +
            '<td>'+counter+'</td>' +
            '<td>'+imageurl+'</td>' +
            '<td>'+name+'</td>' +
            '<td>'+manacost+'</td>' +
            '<td>'+cmc+'</td>' +
            '</tr>');

        $(this).remove();

        updateDeckDetails(manacost, cmc);
    })

    function updateDeckDetails(manacost, cmc) {
        $('#deck-cards-count').html($('.my-deck-record').length);

        if(manacost != '{W}' && manacost != '{W}{W}' && manacost != '{X}{W}') {
            $('#deck-sum-mana-cost').html(
                Number( $('#deck-sum-mana-cost').html() ) + cmc
            );

            $('#deck-average-mana-cost').html(
                ((Number( $('#deck-sum-mana-cost').html() ) + cmc) / $('.my-deck-record').length).toFixed(2)
            );
        }
    }

} );