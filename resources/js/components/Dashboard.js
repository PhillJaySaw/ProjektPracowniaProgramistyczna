import React from "react";
import Post from "./Post";
import AddArticle from "./AddArticle";
import DeleteArticle from "./DeleteArticle";
/* Dashboard Component */

class Dashboard extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            articles: []
        };
        this.handleAddArticle = this.handleAddArticle.bind(this);
        this.handleDeleteArticle = this.handleDeleteArticle.bind(this);
    }

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

    handleAddArticle(article) {
        article.key = Number(article.key);
        fetch("api/articles/", {
            method: "post",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json"
            },

            body: JSON.stringify(article)
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                this.setState(prevState => ({
                    articles: prevState.articles.concat(data)
                }));
            });
    }

    handleDeleteArticle(article) {
        console.log(article);
        article.article_id = Number(article.article_id);
        fetch("api/articles/" + article.article_id, {
            async: false,
            method: "delete"
        }); /*
            .then(response => {
                return response.json();
            })
            .then(articles => {
                //Fetched product is stored in the state
                console.log("adding to state");
                this.setState({ articles });
            }); */
        this.componentDidMount();
    }

    render() {
        return (
            <div className="dashboard">
                <AddArticle onAdd={this.handleAddArticle} />
                <DeleteArticle onAdd={this.handleDeleteArticle} />
                {this.state.articles
                    .slice(0, this.state.articles.length)
                    .reverse()
                    .map(article => {
                        return (
                            <Post
                                id={article.id}
                                key={article.id}
                                title={article.title}
                                author={article.author_id}
                                content={article.content}
                            />
                        );
                    })}
            </div>
        );
    }
}

export default Dashboard;
