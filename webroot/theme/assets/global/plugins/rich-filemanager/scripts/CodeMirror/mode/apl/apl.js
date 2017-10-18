(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS
    mod(require("../../lib/codemirror"));
  else if (typeof define == "function" && define.amd) // AMD
    define(["../../lib/codemirror"], mod);
  else // Plain browser env
    mod(CodeMirror);
})(function(CodeMirror) {
"use strict";

CodeMirror.defineMode("apl", function() {
  var builtInOps = {
    ".": "innerProduct",
    "\\": "scan",
    "/": "reduce",
    "⌿": "reduce1Axis",
    "⍀": "scan1Axis",
    "¨": "each",
    "⍣": "power"
  };
  var builtInFuncs = {
    "+": ["conjugate", "add"],
    "−": ["negate", "subtract"],
    "×": ["signOf", "multiply"],
    "÷": ["reciprocal", "divide"],
    "⌈": ["ceiling", "greaterOf"],
    "⌊": ["floor", "lesserOf"],
    "∣": ["absolute", "residue"],
    "⍳": ["indexGenerate", "indexOf"],
    "?": ["roll", "deal"],
    "⋆": ["exponentiate", "toThePowerOf"],
    "⍟": ["naturalLog", "logToTheBase"],
    "○": ["piTimes", "circularFuncs"],
    "!": ["factorial", "binomial"],
    "⌹": ["matrixInverse", "matrixDivide"],
    "<": [null, "lessThan"],
    "≤": [null, "lessThanOrEqual"],
    "=": [null, "equals"],
    ">": [null, "greaterThan"],
    "≥": [null, "greaterThanOrEqual"],
    "≠": [null, "notEqual"],
    "≡": ["depth", "match"],
    "≢": [null, "notMatch"],
    "∈": ["enlist", "membership"],
    "⍷": [null, "find"],
    "∪": ["unique", "union"],
    "∩": [null, "intersection"],
    "∼": ["not", "without"],
    "∨": [null, "or"],
    "∧": [null, "and"],
    "⍱": [null, "nor"],
    "⍲": [null, "nand"],
    "⍴": ["shapeOf", "reshape"],
    ",": ["ravel", "catenate"],
    "⍪": [null, "firstAxisCatenate"],
    "⌽": ["reverse", "rotate"],
    "⊖": ["axis1Reverse", "axis1Rotate"],
    "⍉": ["transpose", null],
    "↑": ["first", "take"],
    "↓": [null, "drop"],
    "⊂": ["enclose", "partitionWithAxis"],
    "⊃": ["diclose", "pick"],
    "⌷": [null, "index"],
    "⍋": ["gradeUp", null],
    "⍒": ["gradeDown", null],
    "⊤": ["encode", null],
    "⊥": ["decode", null],
    "⍕": ["format", "formatByExample"],
    "⍎": ["execute", null],
    "⊣": ["stop", "left"],
    "⊢": ["pass", "right"]
  };

  var isOperator = /[\.\/⌿⍀¨⍣]/;
  var isNiladic = /⍬/;
  var isFunction = /[\+−×÷⌈⌊∣⍳\?⋆⍟○!⌹<≤=>≥≠≡≢∈⍷∪∩∼∨∧⍱⍲⍴,⍪⌽⊖⍉↑↓⊂⊃⌷⍋⍒⊤⊥⍕⍎⊣⊢]/;
  var isArrow = /←/;
  var isComment = /[⍝#].*$/;

  var stringEater = function(type) {
    var prev;
    prev = false;
    return function(c) {
      prev 