-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/08/2024 às 00:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brain_keeper_crud`
--
-- --------------------------------------------------------
--
-- Estrutura para tabela `notas`
--
CREATE TABLE
    `notas` (
        `id` int (11) NOT NULL,
        `titulo` varchar(255) DEFAULT NULL,
        `conteudo` text DEFAULT NULL,
        `clima` varchar(255) DEFAULT NULL,
        `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
        `usuario_id` int (11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notas`
--
INSERT INTO
    `notas` (
        `id`,
        `titulo`,
        `conteudo`,
        `clima`,
        `data_criacao`,
        `usuario_id`
    )
VALUES
    (
        16,
        'Titulo 1',
        'Lorem ipsum dolor sit amet. Este programa de armazenamento de notas é, sem dúvida, uma obra-prima da organização digital.',
        NULL,
        '2024-08-10 03:57:37',
        NULL
    ),
    (
        17,
        'Titulo 2',
        'Lorem ipsum dolor sit amet. Est veritatis ducimus aut quaerat accusamus et facilis quisquam qui autem ipsa et ipsa incidunt vel iure veritatis ab recusandae dolores. Ea soluta dolor aut sunt atque et veritatis provident vel voluptas expedita et repudiandae optio ea explicabo labore est dolorem velit. In nihil sint et alias doloribus non velit dolore. Sit cumque molestias ut nulla dolores ut earum deleniti rem officia iure aut quisquam internos. Et exercitationem temporibus aut architecto error et odio ipsam ut quia illo sit dolorem illo? Sit laborum modi qui nesciunt quis eos doloremque sapiente. Aut ipsam itaque qui suscipit numquam non commodi nihil eos nulla nemo aut labore consequatur vel voluptas natus. Vel modi omnis et amet quia aut laudantium accusantium est error atque. Est distinctio recusandae qui repudiandae nobis qui quas nulla ea doloremque quia id saepe odit ut quidem consequuntur est laboriosam accusamus. Ad molestiae doloremque ut modi dolor et nulla totam qui aliquid recusandae. Rem dolores aperiam a ipsum amet non doloremque nisi sed quidem autem eum praesentium voluptas hic iusto voluptatem qui repudiandae molestiae. Ut velit eligendi id reiciendis dolores rem ipsum deleniti et consequatur odio eos obcaecati eveniet ab suscipit dolores ut voluptatibus maxime. Hic facere nobis qui fuga omnis quo dolorem quas non Quis labore At quaerat quibusdam ut nihil illo. Hic recusandae omnis sed voluptas voluptatem 33 sequi consequatur sit nihil delectus. Sed modi dicta a iure fugiat cum magni nihil eum perspiciatis dolore cum quam labore. Et rerum laboriosam At nihil harum aut voluptas possimus? Et eligendi harum sit eaque vitae et dignissimos architecto ad ipsa architecto aut delectus corporis in omnis voluptate. Et nobis porro nam architecto recusandae cum iusto provident ad culpa facilis. Et quidem laboriosam aut veritatis iste quo alias vero?',
        NULL,
        '2024-08-10 03:57:47',
        NULL
    ),
    (
        18,
        'Titulo 3',
        'Lorem ipsum dolor sit amet. Dgnissimos ab maiores esse est corporis recusandae et impedit vero aut autem adipisci. Hic recusandae expedita ut numquam ullam ab officia quia. Et dolorum quis sit rerum dolorum et voluptatem voluptatibus est accusantium laborum 33 magnam eveniet qui dolorum quia ut neque accusamus. Nam beatae dolores est reprehenderit consequuntur aut iure quia aut inventore incidunt. Id ipsum laboriosam sed distinctio porro aut ratione reiciendis ut labore itaque.',
        NULL,
        '2024-08-10 04:00:10',
        NULL
    ),
    (
        19,
        'Titulo 4',
        'Lorem ipsum dolor sit amet. Ut  ab temporibus obcaecati aut tenetur beatae. Ut assumenda quos et facere rerum ea amet deserunt non deleniti expedita. Sit accusamus vero qui laudantium perferendis in aspernatur voluptatem qui excepturi nihil sit suscipit ipsum qui autem similique? Aut autem odio aut nemo vitae et porro minima.',
        NULL,
        '2024-08-10 04:01:51',
        NULL
    ),
    (
        20,
        'Titulo 5',
        'Lorem ipsum dolor sit amet. Et tenetur numquam vel iure minus sit omnis voluptates qui saepe repellat non sunt deleniti. Qui consectetur inventore et tempora ipsam rem temporibus numquam. Et dolores assumenda aut minus expedita sit amet minus. Ut atque culpa est sint dolor ut eveniet officia vel consectetur aliquam aut delectus nemo. In tenetur doloribus sed galisum nihil qui exercitationem Quis in tempora consequatur aut delectus nobis qui quia odit nam vitae nemo. Cum fugit officia in atque dolores sit debitis doloribus. Eum dolores reiciendis non totam dolor ex sunt iste. Qui saepe perspiciatis aut magnam excepturi eos distinctio perferendis At beatae laborum qui sint consequatur. Sed quia quas in sapiente quidem nam velit recusandae 33 fugit aliquid eos accusantium vero qui mollitia adipisci vel ullam deleniti. Ab Quis dolor sed quidem quia non ipsum voluptatem qui quia beatae sed dolores quam in porro explicabo. Sit laboriosam quia et perferendis quasi eos incidunt soluta cum veniam voluptatibus cum voluptatem rerum vel quidem ducimus qui corporis nisi! Hic odit autem vel itaque natus aut velit velit eos vitae repudiandae sed nemo alias et illum nihil. Et repellendus unde et pariatur quia et dignissimos deserunt est cupiditate minima. Sit quidem eligendi eos itaque iste eum omnis reiciendis eos animi minus? Ad molestiae repellendus et voluptatum minima sit quia sequi non cumque repellendus aut ullam dolorem. Sit iure consequuntur eos omnis quis et ipsa quisquam quo numquam itaque nam sunt doloribus ab expedita odit eum facilis vitae. Ut galisum totam est repellendus quia est explicabo voluptatibus non tenetur mollitia vel distinctio omnis aut nulla cumque aut quia molestiae. Et suscipit nulla vel omnis nostrum et excepturi laboriosam sit sint animi qui consequatur alias ea modi possimus ut numquam obcaecati! Cum quod voluptate a odio provident aut quaerat impedit cum repellat soluta ut iure optio et velit incidunt hic aliquid voluptatum. Quo alias dolorem At autem quas eum Quis error.',
        NULL,
        '2024-08-10 04:02:22',
        NULL
    ),
    (
        21,
        'Titulo 6',
        'Lorem ipsum dolor sit amet. Aut sint repellendus ea culpa Quis vel quam enim quo culpa voluptas cum quae quia. Ut molestiae facilis rem rerum voluptates eum culpa eius sit libero aliquid et esse amet sed perferendis voluptas.',
        NULL,
        '2024-08-10 04:02:45',
        NULL
    ),
    (
        22,
        'Titulo 7',
        'Lorem ipsum dolor sit amet. Qui quis  voluptatem ab repellee voluptatum ut autem quod. Et sequi galisum non quia cupiditate est architecto obcaecati et eius adipisci.',
        NULL,
        '2024-08-10 04:03:17',
        NULL
    ),
    (
        24,
        'Titulo 9',
        'Lorem ipsum dolor sit amet. O tamanho acessível é obraprima informações da Bootstrap faz atende como mas enriquece admirável do notável nível. De organizada admirável é esse não que ajustam intuitiva pro usuário notas do programa informações? Que devido atende o apenas perca de demonstra modernas com detalhes nota do domínio cada o notas organização. E perca tecnologias e cada design de impressionantes tratada. O devido importante que independentemente ajustam a desde dúvida? Que admirável necessidade com obraprima usuário que esteticamente independentemente é importante responsividade e sofisticação interação os visual desde. é proporcionando cuidado a importante notas a acessível destaque o atende organização. Ele eficiência atende mas entrada destaque e não esse uma usuário enriquece. Que devido proporcionando e experiência independentemente do agradável devido ao automaticamente impressionantes pro essencial visual. Que fluida eficiência que notável notas do obraprima torna de enriquece notável o gerenciamento complexidade e verdadeiramente técnico da independentemente agradável. De design ajustam de esse este que clara demonstra de cada incrivelmente. De interface gerenciamento que detalhes notas que notas esteticamente. A cada onde uso Bootstrap agradável da armazenamento nível que complexidade integração com interface integração. De notável incrivelmente de experiência acessível da impressionantes entrada que detalhe modal. Os integração tratada com Bootstrap nunca uso cada nunca que organização apenas a usuário automaticamente é detalhes clara ele intuitiva Bootstrap. De dúvida agradável com proporcionando domínio de enriquece usuário uma impressionantes interface de este Bootstrap um cada maneira uma conteúdo gerenciamento. Uma organizada cada de eficiência digital ele maneira armazenamento de entrada acessível? Com design gerenciamento se detalhe apenas sem responsividade interação pro como demonstra ao organização esteticamente de nível cuidado com admirável importante. O enriquece responsividade que cuidado integração a agradável gerenciamento e entrada detalhe o atenção maneira. é independentemente este um intuitiva intuitiva é essencial tratada e domínio essencial. Sem interação tecnologias de elevam devido se destaque usuário é nível interação se usuário eficiência?',
        NULL,
        '2024-08-10 04:03:44',
        NULL
    ),
    (
        25,
        'Titulo 10',
        'Lorem ipsum dolor sit amet. De necessidade notas faz organização visual de dúvida cada de torna gerenciamento sem notável automaticamente. Se devido essencial ou design incrivelmente a detalhe importante ao impressionantes agradável que nota usuário. é automaticamente agradável mas fluida usuário uma esteticamente destaque com como modernas. é sofisticação independentemente o clara integração uso acessível independentemente uma rápida perfeita os nível usuário que usuário apenas seu admirável cuidado. Faz notas detalhe uma verdadeiramente modernas uma tamanho agradável de sofisticação ajustam uma Bootstrap essencial. De agradável este do essencial admirável os cada obraprima um incrivelmente usuário uma ajustam maneira e atenção digital. O esse este das rápida apenas um nível gerenciamento é destaque maneira que atenção detalhes com nota armazenamento. Uma esse notas de acessível nota uma cuidado necessidade uso independentemente clara é design interação uma detalhes informações! Pro modernas rápida pro gerenciamento usuário é perfeita esteticamente ao obraprima necessidade. O cada atenção faz organização desde de modernas demonstra é atende organização de armazenamento design é perca visual e nunca detalhes. é sofisticação maneira a tamanho cuidado é sofisticação complexidade e ajustam usuário faz até demonstra a tratada responsividade a cada tecnologias. O sofisticação interação sem domínio ajustam do cada fluida é dúvida destaque de notas demonstra? Ele gerenciamento Bootstrap é cada desde um nível programa de enriquece tratada da nível incrivelmente os complexidade como mas dúvida independentemente? O tratada esteticamente é eficiência independentemente é proporcionando esteticamente da Bootstrap usuário pro perfeita incrivelmente? Ao visual cada o detalhes técnico de como informações de impressionantes devido de design organização o ajustam onde e usuário detalhe. E Bootstrap incrivelmente de interface gerenciamento que integração atende de demonstra cada de independentemente torna. Ou agradável programa uso impressionantes intuitiva o usuário não. De este notas uso nível experiência o fluida maneira. Ou intuitiva complexidade do essencial entrada a usuário agradável de destaque não faz apenas interface.',
        NULL,
        '2024-08-10 04:04:08',
        NULL
    ),
    (
        26,
        'Titulo 11',
        'Lorem ipsum dolor sit amet. é eficiência cuidado é essencial não de importante integração. Das experiência técnico é eficiência cuidado com esse impressionantes. De impressionantes experiência com importante detalhe do usuário complexidade. Da notas importante de notas proporcionando a usuário garantindo é Bootstrap interação sem interação este da eficiência desde das detalhe clara. Do informações gerenciamento faz perfeita notas de impressionantes esteticamente o usuário agradável a usuário até que entrada maneira que garantindo essencial. O usuário garantindo seu agradável devido o cada atende faz visual acessível sem cuidado perca se agradável enriquece.',
        NULL,
        '2024-08-10 04:04:28',
        NULL
    ),
    (
        35,
        'aaa',
        'hhh',
        NULL,
        '2024-08-17 18:10:13',
        NULL
    ),
    (
        36,
        'aaaa',
        'vvvva',
        NULL,
        '2024-08-17 18:10:17',
        NULL
    ),
    (
        44,
        'hhhhhhhhhhhhhhh',
        'aaaaaaa',
        NULL,
        '2024-08-17 18:20:39',
        NULL
    ),
    (
        45,
        'hihi',
        'hyhy',
        NULL,
        '2024-08-17 18:22:18',
        NULL
    ),
    (46, 'aham', 'AAA', NULL, '2024-08-17 22:09:51', 4);

--
-- Índices para tabelas despejadas
--
--
-- Índices de tabela `notas`
--
ALTER TABLE `notas` ADD PRIMARY KEY (`id`),
ADD KEY `fk_usuario` (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 48;

--
-- Restrições para tabelas despejadas
--
--
-- Restrições para tabelas `notas`
--
ALTER TABLE `notas` ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;