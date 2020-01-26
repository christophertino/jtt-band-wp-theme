# Just the Tip Band Theme

A dynamic and responsive Wordpress theme using Foundation 6.

Visit [justthetipband.com](https://www.justthetipband.com)

## Installation

Clone the repo to your themes directory and follow the development instructions below to build the distribution files. You'll also need to install the following WordPress plugins:

+ [Advanced Custom Fields](https://www.advancedcustomfields.com/)
+ [GigPress](http://gigpress.com/)

## Development Instructions

Follow these steps to build theme distribution files

### Installation
```sh
# Install local npm packages
$ yarn install
```

### Building
```sh
# Build all sources
$ yarn build
```

```sh
# Build for production
$ yarn build.prod
```

```sh
# Build and watch for changes
$ yarn watch
```

### Ansible Deployment
```sh
# Install the JTT Theme
$ ansible-playbook ansible/provision.yml
```

```sh
# Deploy changes from GitHub
$ ansible-playbook ansible/deploy.yml
```

## License
[MPL-2.0](https://www.mozilla.org/en-US/MPL/2.0/) Copyright 2020 Just the Tip Band. All rights reserved.

See [LICENSE](LICENSE)
