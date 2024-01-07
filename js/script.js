// Progress Bar with Scroll Page
window.onscroll = function(){
    var pos = document.documentElement.scrollTop;
    var calc_height = document.documentElement.scrollHeight-document.documentElement.clientHeight;
    var scroll = pos * 100 / calc_height;
    document.getElementById("progress").style.width = scroll + "%" ;
}

// Loader here
window.onload = function(){
 document.getElementById("loader").style.display = "none";
 document.getElementById("mainContent").style.display = "block";
}

//HTML TAGS SECTION CODE HERE
$(document).ready(function () {
    // Function to filter the tags based on the search input
    function filterTags() {
        var searchInput = $('#searchInput').val().toLowerCase();

        $('.list-group-item').each(function () {
            var tagText = $(this).text().toLowerCase();
            if (tagText.includes(searchInput)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Trigger the filterTags function on keyup event in the search input
    $('#searchInput').on('keyup', filterTags);
});