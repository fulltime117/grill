window.addEventListener('load', ()=>{
    resize(); // Resizes the canvas once the window loads
    document.getElementById("canvas").addEventListener('mousedown', startPainting);
    document.getElementById("canvas").addEventListener('mouseup', stopPainting);
    document.getElementById("canvas").addEventListener('mousemove', sketch);
});

const canvas = document.querySelector('#canvas');
const ctx = canvas.getContext('2d');
let is_signed = false;

// Stores the initial position of the cursor
let coord = {x:0 , y:0};
let paint = false;


function clearCanvas() {
    ctx.clearRect(0, 0, document.getElementById("canvas").offsetWidth, document.getElementById("canvas").offsetHeight);
    is_signed = false;
}



function resize(){
    ctx.canvas.width = document.getElementById("canvas").offsetWidth;
    ctx.canvas.height = document.getElementById("canvas").offsetHeight;
}

function getPosition(event){
    coord.x = event.clientX - getOffset(canvas).left;
    coord.y = event.clientY - getOffset(canvas).top;
}

function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left,
        top: rect.top
    };
}

function startPainting(event){
    paint = true;
    getPosition(event);
}

function stopPainting(){
    paint = false;
}

function sketch(event){
    if (!paint) return;
    ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.lineCap = 'round';
    ctx.strokeStyle = 'green';
    ctx.moveTo(coord.x, coord.y);
    is_signed = true;

    getPosition(event);

    ctx.lineTo(coord.x , coord.y);
    ctx.stroke();
}




function getTouchPosition(touch){
    coord.x = touch.clientX - getOffset(canvas).left;
    coord.y = touch.clientY - getOffset(canvas).top;
}
function handleStart(evt)
{
    evt.preventDefault();
    var touches = evt.changedTouches;
    getTouchPosition(touches[0]);
    paint = true;
}
function handleEnd(evt){
    evt.preventDefault();
    paint = false;
}
function handleMove(evt) {
    evt.preventDefault();
    if (!paint) return;
    ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.lineCap = 'round';
    ctx.strokeStyle = 'green';
    ctx.moveTo(coord.x, coord.y);
    is_signed = true;

    var touches = evt.changedTouches;
    getTouchPosition(touches[0]);

    ctx.lineTo(coord.x , coord.y);
    ctx.stroke();
}