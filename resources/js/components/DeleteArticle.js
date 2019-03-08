import React from "react";

class DeleteArticle extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            articleToDelete: {
                article_id: null
            }
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }

    handleInput(key, e) {
        var state = Object.assign({}, this.state.articleToDelete);
        state[key] = e.target.value;
        this.setState({ articleToDelete: state });
    }

    handleSubmit(e) {
        e.preventDefault();
        this.props.onAdd(this.state.articleToDelete);
    }

    render() {
        return (
            <div className="add-article-form delete">
                <h2>DeleteArticle</h2>
                <div>
                    <form onSubmit={this.handleSubmit}>
                        <label>
                            article_id:
                            <div className="ui input">
                                <input
                                    type="text"
                                    onChange={e =>
                                        this.handleInput("article_id", e)
                                    }
                                />
                            </div>
                        </label>
                        <input type="submit" value="submit" />
                    </form>
                </div>
            </div>
        );
    }
}

export default DeleteArticle;
