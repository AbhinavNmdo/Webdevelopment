import './App.css';
import About from './components/About';
import NavBar from './components/NavBar';
import News from './components/News';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

function App() {
  return (
    <>
      <NavBar/>
      <Router>
        <Switch>
          <Route path="/">
            <News pageSize={10} category="space"/>
          </Route>
          <Route path="/General">
            <News pageSize={10} category="general"/>
          </Route>
          <Route path="/Business">
            <News pageSize={10} category="business"/>
          </Route>
          <Route path="/Entertainment">
            <News pageSize={10} category="entertainment"/>
          </Route>
          <Route path="/Health">
            <News pageSize={10} category="health"/>
          </Route>
          <Route path="/Science">
            <News pageSize={10} category="science"/>
          </Route>
          <Route path="/Sports">
            <News pageSize={10} category="sports"/>
          </Route>
          <Route path="/Technology">
            <News pageSize={10} category="technology"/>
          </Route>
          <Route path="/about">
            <About/>
          </Route>
        </Switch>
      </Router>
    </>
  );
}

export default App;
