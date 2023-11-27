// Progress Bar with Scroll Page
window.onscroll = function(){
    var pos = document.documentElement.scrollTop;
    var calc_height = document.documentElement.scrollHeight-document.documentElement.clientHeight;
    var scroll = pos * 100 / calc_height;
    document.getElementById("progress").style.width = scroll + "%" ;
}

window.onload = function() {
    const fieldset = document.querySelector('fieldset');

    // Function to update the legend with the current dimensions
    function updateLegend() {
        const legend = fieldset.querySelector('legend');
        legend.textContent = `Width: ${fieldset.clientWidth}px, Height: ${fieldset.clientHeight}px`;
    }

    // Attach the updateLegend function to the resize event
    fieldset.addEventListener('resize', updateLegend);

    // Initial update of the legend
    updateLegend();
};
