if(color) {
  const svgs = document.querySelectorAll(".car svg");

  const mapping = {
    "preto" : "#131313",
    "cinza" : "gray",
    "prata" : "silver",
    "branco" : "white",
    "dourado" : "gold",
    "amarelo" : "yellow",
    "laranja" : "orange",
    "bege" : "beige",
    "bordô" : "maroon",
    "vermelho" : "red",
    "verde" : "green",
    "azul" : "blue",
    "lilás" : "violet",
    "violeta" : "violet",
    "roxo" : "purple",
  }

  color = color.toLowerCase();

  if(color in mapping) {
    color = mapping[color];
  } else {
    color = "white";    
  }
  
  svgs.forEach(svg => svg.style["fill"] = color)
}