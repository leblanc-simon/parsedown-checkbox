### test GitHub's checkbos

~~~~
- [ ] test 1
- [] test 2
- [x] test 3
    - [ ] test 4
    - [x] test 5
- [test](https://markdown.org) 6
- [x](https://markdown.org) test 7

another

- [ ] test 10
- [x] test 10

list
- test 20
- test 21
~~~~

- [ ] test 1
- [] test 2
- [x] test 3
    - [ ] test 4
    - [x] test 5
- [test](https://markdown.org) 6
- [x](https://markdown.org) test 7

another

- [ ] test 10
- [x] test 10

list
- test 20
- test 21

~~~~html
<ul class="contains-task-list">
  <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" type="checkbox"> test 1</li>
  <li>[] test 2</li>
  <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" checked="" type="checkbox"> test 3
    <ul class="contains-task-list">
      <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" type="checkbox"> test 4</li>
      <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" checked="" type="checkbox"> test 5</li>
    </ul>
  </li>
  <li><a href="https://markdown.org" rel="nofollow">test</a> 6</li>
  <li><a href="https://markdown.org" rel="nofollow">x</a> test 7</li>
</ul>
<p>another</p>
<ul class="contains-task-list">
  <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" type="checkbox"> test 10</li>
  <li class="task-list-item"><input id="" disabled="" class="task-list-item-checkbox" checked="" type="checkbox"> test 10</li>
</ul>
<p>list</p>
<ul>
  <li>test 20</li>
  <li>test 21</li>
</ul>
~~~~
