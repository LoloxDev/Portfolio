new fullpage("#fullpage", {
    autoScrolling: true,
    navigation: true,
    anchors: ['section1', 'section2', 'section3', 'section4', 'section5'],
    fixedElements:'.nav, #loader',
    navigationTooltips: ['Acceuil','Projets','Parcours','Compétences','Présentation'],
    showActiveTooltip: true,
    navigationPosition:true,
    slidesNavigation: true,

});