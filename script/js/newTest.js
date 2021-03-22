const questionsDiv = document.getElementById('quests');

let id = 0;

function AddQuestion() {
    let div = document.createElement('div');
    let inp = document.createElement("input");
    let btn = document.createElement("button");
    let txt1 = document.createElement('div');
    let txt2 = document.createElement('div');
    let hr = document.createElement('hr');
  
    txt1.innerText = 'Вопрос:';
    txt2.innerText = 'Ответы:';
    
    div.setAttribute('id', 'answer-group-' + id);
    
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