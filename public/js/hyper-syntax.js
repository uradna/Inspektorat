! function() {
    "use strict";
    jQuery(document).ready(function() {
        document.querySelectorAll("pre span.escape").forEach(function(e, n) {
            e.classList.contains("escape");
            for (var t = 1 / 0, r = e.innerText.replace(/^\n/, "").trimRight().split("\n"), c = 0; c < r.length; c++) r[c].trim() && (t = Math.min(r[c].search(/\S/), t));
            for (var i = [], c = 0; c < r.length; c++) i.push(r[c].replace(new RegExp("^ {" + t + "}", "g"), ""));
            e.innerText = i.join("\n")
        }), document.querySelectorAll("pre span.escape").forEach(function(e) {
            hljs.highlightBlock(e)
        })
    })
}();