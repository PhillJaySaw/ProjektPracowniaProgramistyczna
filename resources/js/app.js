import React from "react";
import ReactDOM from "react-dom";
import Main from "./components/Main";

require("./bootstrap");

class App extends React.Component {
    render() {
        return <Main />;
    }
}

ReactDOM.render(<App />, document.querySelector("#root"));
