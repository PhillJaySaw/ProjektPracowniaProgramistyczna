import React from "react";

class AddArticle extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            newArticle: {
                title: "",
                content: "",
                author_id: null
            }
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }

    handleInput(key, e) {
        var state = Object.assign({}, this.state.newArticle);
        state[key] = e.target.value;
        this.setState({ newArticle: state });
    }

    handleSubmit(e) {
        e.preventDefault();
        this.props.onAdd(this.state.newArticle);
    }

    render() {
        const divStyle = {};

        return (
            <div className="add-article-form">
                <h2>Add new article</h2>
                <div>
                    <form onSubmit={this.handleSubmit}>
                        <label>
                            Title:
                            <div className="ui input">
                                <input
                                    type="text"
                                    onChange={e => this.handleInput("title", e)}
                                />
                            </div>
                        </label>
                        <br />

                        <label>
                            Content:
                            <div className="ui input">
                                <input
                                    type="text"
                                    onChange={e =>
                                        this.handleInput("content", e)
                                    }
                                />
                            </div>
                        </label>
                        <br />

                        <label>
                            author_id:
                            <div className="ui input">
                                <input
                                    type="text"
                                    onChange={e =>
                                        this.handleInput("author_id", e)
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

export default AddArticle;
