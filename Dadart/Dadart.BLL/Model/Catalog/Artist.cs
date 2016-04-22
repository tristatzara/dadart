using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Catalog
{
    public class Artist
    {
        public Guid ArtistId { get; set; }
        public string Firstname { get; set; }
        public string Lastname { get; set; }
    }
}
