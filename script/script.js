document.getElementById('action').addEventListener('change', function() {
    if(this.value == 'resize') {
        document.getElementById('resize').style.display = 'block';
        document.getElementById('border').style.display = 'none';
    } else if(this.value == 'border') {
        document.getElementById('resize').style.display = 'none';
        document.getElementById('border').style.display = 'block';
    }
});
const checkbox = document.getElementById('respectRatio');

checkbox.addEventListener('change', function(event) {
if (event.target.checked) {
    // checkbox is checked
    // hide width and height fields
    document.getElementById('ratioby').style.display = 'block';
    document.getElementById('width').style.display = 'none';
    document.getElementById('height').style.display = 'none';
    document.getElementById('widthlabel').style.display = 'none';
    document.getElementById('heightlabel').style.display = 'none';
} else {
    // checkbox is not checked
    // show width and height fields
    document.getElementById('ratioby').style.display = 'none';
    document.getElementById('width').style.display = 'inline-block';
    document.getElementById('height').style.display = 'inline-block';
    document.getElementById('widthlabel').style.display = 'inline-block';
    document.getElementById('heightlabel').style.display = 'inline-block';
    
}
});
document.getElementById('ratioby').addEventListener('change', function() {
    if(this.value == 'width') {
        document.getElementById('width').style.display = 'inline-block';
        document.getElementById('height').style.display = 'none';
        document.getElementById('widthlabel').style.display = 'inline-block';
        document.getElementById('heightlabel').style.display = 'none';
    } else if(this.value == 'height') {
        document.getElementById('height').style.display = 'inline-block';
        document.getElementById('width').style.display = 'none';
        document.getElementById('widthlabel').style.display = 'none';
        document.getElementById('heightlabel').style.display = 'inline-block';
    }
});