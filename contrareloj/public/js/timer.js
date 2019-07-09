var timer = $('.timer').circleProgress({
  value: 0,
  size: 100,
  startAngle: 4.75,
  reverse: false,
  fill: {
    gradient: ["#440A7F", "#6a10c6"]
  },
  lineCap: 'round',
  animation: { duration: 3000, easing: "circleProgressEasing" },
  animationStartValue: 1
});

timer.on('circle-animation-progress', function(e, v) {
  var obj = $(this).data('circle-progress'),
  ctx = obj.ctx,
  s = obj.size + 3,
  sv = (3 - (3 * v).toFixed()),
  fill = obj.arcFill;

  console.log(v);
  
  ctx.save();
  ctx.font = "bold " + s / 2.5 + "px sans-serif";
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillStyle = fill;
  ctx.fillText(sv, s / 2, s / 2 + 2.5);
  ctx.restore();
});