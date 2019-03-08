import React from "react";

/* Post Component */
class Post extends React.Component {
    render() {
        return (
            <div className="post">
                <div className="post-heading">
                    <h1 className="post-title">{this.props.title}</h1>
                    <h2 className="post-author">by: {this.props.author}</h2>
                    <h2 className="post-id">article id:{this.props.id}</h2>
                </div>
                <p className="post-content">{this.props.content}</p>
            </div>
        );
    }
}

export default Post;
