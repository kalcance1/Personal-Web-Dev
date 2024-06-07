<!doctype html>
<title>Example</title>
<style>
#grid { 
  display: grid;
  grid-template-rows: 60px 10px ;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: minmax(190px, auto); 
  
  grid-gap: 10px;
  }
#grid > div {
  padding: .5em;
  background: gold;
  text-align: center;
}
</style>
<div id="grid">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
  <div>5</div>
  <div>6</div>
  <div>6</div>
  <div>6</div>
  <div>6</div>

</div>