import './App.css';
// import About from './components/About';
import NavBar from './components/NavBar';
import News from './components/News';
import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";

function App() {
  return (
    <>
    <Router>
      <NavBar/>
      <Switch>
        <Route exact path="/">
          <News key="science" category="science" pageSize={10}/>
        </Route>
        <Route exact path="/general">
          <News key="general" category="general" pageSize={10} />
        </Route>
        <Route exact path="/business">
          <News key="business" category="business" pageSize={10} />
        </Route>
        <Route exact path="/entertainment">
          <News key="entertainment" category="entertainment" pageSize={10} />
        </Route>
        <Route exact path="/health">
          <News key="health" category="health" pageSize={10} />
        </Route>
        <Route exact path="/sports">
          <News key="sports" category="sports" pageSize={10} />
        </Route>
        <Route exact path="/technology">
          <News key="technology" category="technology" pageSize={10} />
        </Route>
      </Switch>
    </Router>
    </>
  );
}

export default App;
