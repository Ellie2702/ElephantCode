// function addfieldFunction() {
//   var r = document.createElement('div');
//   var y = document.createElement("INPUT");
//   var z = document.createElement("INPUT");
//   y.setAttribute("class", "dash-input");
//   y.setAttribute("type", "text");
//   y.setAttribute("placeholder", "University");
//   z.setAttribute("class", "dash-input");
//   z.setAttribute("type", "text");
//   z.setAttribute("placeholder", "Course");
//   increment();
//   y.setAttribute("name", "a_level[" + i + "][0]"); //Keep attribute in lower case
//   r.appendChild(y);
//   z.setAttribute("name", "a_level[" + i + "][1]");
//   r.appendChild(z);
//   document.getElementById("form-div").appendChild(r);
// }

const questionsDiv = document.getElementById('questions');

let id = 0;

function addQuestion() {
  let div = document.createElement('div');
  let inp = document.createElement("input");
  let btn = document.createElement("button");
  let txt1 = document.createElement('div');
  let txt2 = document.createElement('div');
  let hr = document.createElement('hr');

  txt1.innerText = 'Вопрос:';
  txt2.innerText = 'Ответы:';
  
  div.setAttribute('id', 'answer-group-' + id);
  div.setAttribute('class', 'answer-group');
  
  inp.setAttribute('name', 'questions[quest]['+id+'][]');
  
  btn.setAttribute('onclick', 'addAnswer(' + id + ')');
  btn.setAttribute('type', 'button');
  btn.innerText = 'Добавить ответ';

  div.appendChild(btn);
  div.appendChild(txt1);
  div.appendChild(inp);
  div.appendChild(txt2);
  questionsDiv.appendChild(div);
  questionsDiv.appendChild(hr);
  answers[id] = 0;
  id++;
}

let answers = {};

function addAnswer(question) {
  let questionDiv = document.getElementById('answer-group-' + question);
  let inp = document.createElement("input");
  let flag = document.createElement('input');
  
  flag.setAttribute('type', 'checkbox');
  flag.setAttribute('name', 'questions[ansBool]['+question+'][]');
  flag.setAttribute('value', answers[question]);
  
  inp.setAttribute('type', 'text');
  inp.setAttribute('name', 'questions[ans]['+question+'][]');
  questionDiv.appendChild(inp);
  questionDiv.appendChild(flag);
  answers[question]++;
}
