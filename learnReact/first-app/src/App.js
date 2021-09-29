import "./App.css";
import Navbar from "./components/Navbar";
import Textform from "./components/Textform";

function App(props) {
  return (
    <>
      
      <Navbar title="TextConverter"/>
      <div className="container my-4">
        <Textform/>
      </div>
    </>
  );
}

export default App;
