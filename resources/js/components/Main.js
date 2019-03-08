import React, { Component } from "react";
import Sidebar from "./Sidebar";
import Dashboard from "./Dashboard";

/* Main Component */
class Main extends Component {
    constructor() {
        super();
        //Initialize the state in the constructor
        this.state = {
            articles: []
        };
    }
    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */
    componentDidMount() {
        /* fetch API in action */
        fetch("/api/articles")
            .then(response => {
                console.log("fetching articles");
                return response.json();
            })
            .then(articles => {
                //Fetched product is stored in the state
                console.log("adding to state");
                this.setState({ articles });
            });
    }

    render() {
        /* Some css code has been removed for brevity */
        return (
            <main>
                <h1 className="webstie-title"> Article.web </h1>
                <Sidebar articles={this.state.articles} />
                <Dashboard /*articles={this.state.articles}*/ />
            </main>
        );
    }
}

export default Main;
